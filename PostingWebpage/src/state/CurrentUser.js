import { reactive } from 'vue'

export const CurrentUser = reactive({
  /**
   * The user's id
   */
  userId: 1,

  /**
   *
   * @param {*} userId
   */
  changeUser(userId) {
    this.userId = userId;
  },

  getUser() {
    return this.userId
  }
});
