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
            return answer.error.description
          }
        })
        console.log(answer)
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
