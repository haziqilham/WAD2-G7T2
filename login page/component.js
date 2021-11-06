const app = Vue.createApp({
    data() {
        return {
            user: null, // keep track of logged in user
        };
    },
    methods: {
        // TODO doLoginSuccess(...)
        doLoginSuccess(userInfo) {
            // console.log(userInfo)
            this.user = userInfo;
        },
        doRegisterSuccess(userInfo) {
            // console.log(userInfo)
            this.user = userInfo;
        },

        // event handler for logout button
        doLogout() {
            this.user = null;
        },
    }, // methods
});

/**
 * TODO: component "my-login"
 */

app.component('my-login', {
    // props : ['prop1', 'prop2'],

    emits: ['login'],

    template: `<div class="input-group mb-3">
                    <span class="input-group-text">User ID</span>
                    <input type="text" class="form-control" placeholder="apple.2020" v-model=userid>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">Password</span>
                    <input type="password" class="form-control" v-model=pwd>
                </div>
                <button class="btn btn-primary" v-on:click='doLogin'>Login</button>
                <hr>
                <div>{{message}}</div>`,
    // <button class='btn btn-primary' @click='doLogin'>Login</button>


    data() {
        return {
            userid: '',
            pwd: '',
            message: ''
        }
    },

    methods: {
        doLogin() {
            axios
                .post("../services/process_login.php", {
                    email: this.userid,
                    password: this.pwd,
                })
                .then((response) => {
                    // console.log(response)
                    let result = response.data
                    console.log(result)

                    if (result.status) {
                        this.pwd = "";
                        this.$emit("login", {
                            userid: this.userid,
                            name: result["id_name"],
                        })
                    }

                    else {
                        this.message = 'Failed'
                    }
                })
                .catch((error) => {
                    this.message = "Error"
                })

        }

    },



},

app.component('my-register', {
    // props : ['prop1', 'prop2'],

    emits: ['register'],

    template: `<div class="input-group mb-3">
                    <span class="input-group-text">Email</span>
                    <input type="text" class="form-control" placeholder="student.2020@scis.smu.edu.sg" v-model=email>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">User ID</span>
                    <input type="text" class="form-control" placeholder="apple.2020" v-model=userid>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">Password</span>
                    <input type="password" class="form-control" v-model=pwd>
                </div>
                <button class="btn btn-primary" v-on:click='doRegister'>Register</button>
                <hr>
                <div>{{message}}</div>`,
    // <button class='btn btn-primary' @click='doLogin'>Login</button>


    data() {
        return {
            email:'',
            userid: '',
            pwd: '',
            message: ''
        }
    },

    methods: {
        doRegister() {
            axios
                .post("../services/process_register.php", {
                    email: this.email,
                    password: this.pwd,
                    id_name: this.userid
                })
                .then((response) => {
                    // console.log(response)
                    let result = response.data
                    console.log(result)

                    if (result.status) {
                        this.pwd = "";
                        this.$emit("register", {
                            email: this.email,
                            name: result["id_name"],
                        })
                    }

                    else {
                        this.message = 'Failed'
                    }
                })
                .catch((error) => {
                    this.message = "Error"
                })

        }

    },



}
))

const vm = app.mount("#app");
