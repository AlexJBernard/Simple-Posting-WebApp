import axios from 'axios'

const apiClient = axios.create({
  baseURL: 'http://localhost:81',
  withCredentials: false,
  headers: {
    Accept: 'application/json',
    'Content-Type': 'application/json',
  },
})

export default {
  /**
   *
   * @returns A promise containing the result of the user's post request
   */
  postPost(postText, userId) {
    return apiClient.post('/post', {
      "postText": postText,
      "userId": userId
    });
  },

  /**
   *
   */
  getPosts() {
    return apiClient.get('/post');
  }
}
