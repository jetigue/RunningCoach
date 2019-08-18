export const authMixin = {

    computed: {
        isAdmin() {
            return window.App.isAdmin
        },

        isCoach() {
            return window.App.isAdmin || window.App.isCoach
        }
    }
}

