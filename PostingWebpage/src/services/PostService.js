
const baseURL = "http://localhost:81/post"
const headers = new Headers();
headers.append("Accept", "application/json");
headers.append("content-type", "application/json")

export default {
  /**
   * Adds the user's post to the database
   *
   * @param {string} postText The main text of the given post
   * @param {number} userId The userID of the one posting
   * @returns The newest post the user submitted if no errors are detected. Returns a null value otherwise
   */
  async createPost(postText, userId) {

    console.log("Post Service: \n" + postText)
    /**
     * HTTP POST request sent to
     */
    const request = new Request(baseURL, {
      method: "POST",
      headers: headers,
      credentials: "omit",
      body: (JSON.stringify({
        postText: postText,
        userId: userId
      }))
    });

    /**
     * The object returned by this method.
     */
    let responseObject = {
      statusCode: 400,
      postSuccess: false,
      error: ""
    }

    await fetch(request)
    .then(
      /**
       * Uses the response.json method to parse information from the recieved request.
       *
       * @param {Object} response Response retrieved from the API
       */
      async (response) => {
        await response.json()
        .then(
          /**
           * Extracts relevant information from the HTTP response's json representation.
           *
           * @param {Object} response
           */
          (json) => {
            responseObject.statusCode = json.statusCode;

            if (json.statusCode == 200) {
              responseObject.postSuccess = true
            } else {
              responseObject.error = json.message
            }
          }
        )
      }
    )
    .catch(
      /**
       * Function used for handling errors sent by the API or failure to communicate.
       *
       * @param {Object} error Error response sent by invalid HTTP Request
       * @returns A null value
       */
      (error) => {
        console.log(error.description)
        return null
      }
    )

    return responseObject;
  },

  /**
   * Returns the complete list of posts from the application backend.
   *
   * @returns The complete list of posts from the post table
  */
  async getPosts() {
    const request = new Request(baseURL, {
      method: "GET",
      headers: headers,
      credentials: "omit"
    });

    /** Object containing the returned status code and attatched information */
    const responseObject = {
      statusCode: 400,
      error: null,
      posts: null
    }

    await fetch(request)
      .then(
        /**
         * Parses the given HTTP response as a JSON object.
         *
         * @param {Object} response The recieved HTTP Response
         */
        async (response) => {
          await response.json()
            .then(
              /**
               * Retrieves the appropriate information from the given json object, based on the retrieved status code.
               *
               * @param {Object} json The json object attached to the received HTTP response
               */
              (json) => {
                if (json.statusCode == 200) {
                  responseObject.statusCode = json.statusCode
                  responseObject.posts = json.data
                }
              }
            ).catch(
              /**
               * Fallback function if the program fails to parse the given response as a json.
               *
               * @param {Object} error The error response given from the failed function
               */
              (error) => {
                responseObject.statusCode = 404;
                responseObject.error = error.message
              }
            )
        }
      ).catch(
        /**
         * Fallback function for when the program fails to connect to the application's back-end.
         *
         * @param {Object} error The returned HTTP response.
        */
        (error) => {
          responseObject.error = error.message
          responseObject.statusCode = error.statusCode
        }
      )

    return responseObject;
  }
}
