import { reactive } from 'vue'

export const CurrentRoute = reactive({
  /**
   * The current route name
   */
  routeName: 'home',

  /**
   * Changes the current route name
   */
  setRoute(routeName) {
    this.routeName = routeName
  },

  /**
   * Getter function for the current route name
   * @returns The current route name
   */
  getRoute() {
    return this.routeName
  }
})
