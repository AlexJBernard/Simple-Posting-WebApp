/**
 * Sends HTTP Requests without axios
 */


const baseURL = "http://localhost:81/usersdb";
const headers = new Headers();
headers.append("Accept", "application/json")
headers.append("content-type", "application/json")

export default {
  async getUsers() {
    const newRequest = new Request(baseURL, {
      method: "GET",
      headers: headers,
      credentials: "omit"
    });

    const answer = await fetch(newRequest)
    .then(
      async (response) => {

        const answer = await response.json()
        .then((answer) => {
          console.log(answer)
          if (answer.statusCode == 200) {
            return answer.data
          } else {
            console.log(answer.error.description)
            return null
          }
        })
        console.log(answer)
        return answer
      }
    ).catch(
      (error) => {
        console.log(error.description)
        return null
      }
    )

    return answer
  },

  /**
   *
   * @param {*} id
   * @returns The result of the database query
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
     * @type {number}
     */
    const answer = await fetch(newRequest)
    .then(
      async (response) => {
        const answer = await response.json()
        .then(
          /**
           *
           * @param {*} answer Response in json form
           * @returns The user id if a valid statusCode is given. Negative one if otherwise
           */
          (answer) => {
            if (answer.statusCode == 200) {
              return {
                statusCode: answer.statusCode,
                user: answer.data.user
              }
            } else {
              return {
                statusCode: answer.statusCode,
                error: answer.message
              }
            }
          }
        ).catch(
          (error) => {
            return {
              statusCode: error.statusCode,
              error: answer.message
            }
          }
        )
        return answer
      }
    ).catch(
      (error) => {
        return error.message
      }
    )

    return answer
  }
}
