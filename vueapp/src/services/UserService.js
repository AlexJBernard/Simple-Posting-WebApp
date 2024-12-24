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
  getUsers() {
    console.log(import.meta.env.API_HOSTNAME)
    return apiClient.get('/users');
  }
}
