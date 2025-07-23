/**
 * Sends HTTP Requests to the application's back-end using JavaScript's FetchAPI. Retrieves
 * data from the database's user table.
 */

const baseURL = "http://localhost:81/usersdb";
const headers = new Headers();
headers.append("Accept", "application/json")
headers.append("content-type", "application/json")

export default {

  /**
   * Function used to retrieve the complete list of users from the application's database.
   *
   * @returns The complete list of users registered in the application's database. Returns null if
   * a connection error exists.
   */
  async getUsers() {
    const newRequest = new Request(baseURL, {
      method: "GET",
      headers: headers,
      credentials: "omit"
    });

    const answer = await fetch(newRequest)
    .then(

      /**
       * Parses the server's response as a JSON object
       *
       * @param {Object} response HTTP response sent from the project's back-end
       * @returns Either a list of users from the back-end API, or a null value
       */
      async (response) => {

        const answer = await response.json()
        .then(

          /**
           * Retrieves the appropriate information from the given JSON object
           *
           * @param {Object} answer JSON object contained the received HTTP response.
           * @returns Either an array of users, or a null object
           */
          (answer) => {
            console.log(answer)
            if (answer.statusCode == 200) {
              return answer.data
            } else {
              return null
            }
          }
        )

        return answer
      }
    ).catch(

      /**
       * Function for handling failed HTTP requests
       *
       * @param {Object} error HTTP response recieved in the event that the application cannot
       * connect to the back-end.
       * @returns A null value
       */
      (error) => {
        console.log(error.description)
        return null
      }
    )

    return answer
  },

  /**
   * Sends an HTTP GET request to the backend API. Used to find a specific user with the provided
   * id number.
   *
   * @param {number} id The id number of the searched user
   * @returns An object containing the responding statusCode and given data
   */
  async getUser(id) {
    if (typeof(id) != "number") {
      console.log(typeof(id))
      return null
    }

    const newRequest = new Request(baseURL + "/" + id, {
      method: "GET",
      headers: headers,
      credentials: "omit"
    });

    /**
     * @type {Object} An object containing a status code, along with either the error message or
     *  found user object.
     */
    const answer = await fetch(newRequest)
    .then(

      /**
       * Retrieves the first response from the sent GET request.
       *
       * @param {Object} response
       * @returns On object containing the response's statusCode along with either an error
       * message, or retrieved user.
       */
      async (response) => {
        const answer = await response.json()
        .then(
          /**
           * Parses the given response as a json object and extracts the appropriate information.
           *
           * @param {Object} answer Response in json form
           * @returns The message's status code, along with a user object if a status code of 200
           * was returned.
           */
          (answer) => {
            if (answer.statusCode == 200) {
              return {
                statusCode: answer.statusCode,
                user: answer.data.user,
                error: null
              }
            } else {
              return {
                statusCode: answer.statusCode,
                error: answer.message,
                user: null
              }
            }
          }
        ).catch(
          /**
           * Fallback function if the program fails to parse the response as a json.
           *
           * @param {Object} error The given error response.
           * @returns {Object} An object with the given statusCode, along with the given error message
           */
          (error) => {
            return {
              statusCode: error.statusCode,
              error: answer.message,
              user: null
            }
          }
        )

        return answer
      }
    ).catch(

      /**
       * Error handling function for when the sent GET request fails.
       *
       * @param {Object} error HTTP response detailing the given error.
       * @returns Object containing the returned error code and message
       */
      (error) => {
        return {
          statusCode: error.statusCode,
          error: error.message,
          user: null
        }
      }
    )

    return answer
  }
}
