
const app = Vue.createApp({
    data() {
        return {
            user: null, // keep track of logged in user
        };
    },
    methods: {
        // TODO doLoginSuccess(...)
        doLoginSuccess(userInfo) {
            this.user = userInfo;
            if (this.user){
                sessionStorage.setItem("user",  JSON.stringify(this.user))
                window.location.href = '../web/index.html';
            }
        },
        doRegisterSuccess(userInfo) {
            this.user = userInfo;
        },

        // event handler for logout button
        doLogout() {
            this.user = null;
            console.log('logout')
            sessionStorage.removeItem('user')
        },
    }, // methods
    mounted(){
        if (sessionStorage.user){
            console.log(sessionStorage)
            this.user = {'email': sessionStorage.email, 'first_name':sessionStorage.first_name, 'last_name':sessionStorage.last_name}
        }
    }
});


app.component('my-login', {
    // props : ['user'],

    emits: ['login'],

    template: `<div class="container mb-3">
                <div>
                    <div class="row" style="margin-top: 40px;">
                        <div class="col-8" style="text-align: left;">
                            <h4>Welcome to StudySite! Please login.</h4>
                        </div>
                        <div class="col-4" style="text-align: right;">
                            <h6 style="font-size: 12px;" class="text-right">New member? <a href="register.html">Register</a> here.</h6>
                        </div>
                    </div>
                    <form onsubmit="return false;">
                    <div class="container bg-light" style="padding: 10px;">
                        <div class="row" style="margin-top: 10px;">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="student@scis.smu.edu.sg" v-model='userid' required>
                                <div id="emailHelp" class="form-text">Please input a valid student email address!</div>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" v-model='pwd'>
                            </div>
                            <hr>

                            <button v-on:click='doLogin' class="btn btn-info">Login</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>`,

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
                            first_name: result['first_name'],
                            last_name: result['last_name']

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

    template: `<div class="container bg-light" style="padding: 10px;">
                    <div class="row" style="margin-top: 10px;">
                    <form onsubmit="return false;">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="student@scis.smu.edu.sg" v-model='email' required>
                            <div id="emailHelp" class="form-text">Please input a valid student email address!</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" class="form-control" name="first_name" placeholder="Jun Jie" v-model='first_name' required>
                            </div>
                            <div class="col">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="last_name" placeholder="Tan" v-model='last_name' required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" v-model='pwd' required>
                        </div>

                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password" v-model='confirm_pwd' required>
                        </div>

                        <h6 class="mb-3" style="font-size: 10px;">By clicking "SIGN UP", I agree to all the relevant terms and conditions.</h6>
                        <hr>
                        <button v-on:click='doRegister' class="btn btn-info">SIGN UP</button>
                        </form>
                    </div>
                </div>`,

    data() {
        return {
            email: '',
            first_name: '',
            last_name: '',
            pwd: '',
            confirm_pwd: '',
            message: ''
        }
    },

    methods: {
        doRegister() {
            axios
                .post("../services/process_register.php", {
                    email: this.email,
                    password: this.pwd,
                    first_name: this.first_name,
                    last_name: this.last_name

                })
                .then((response) => {
                    // console.log(response)
                    let result = response.data
                    console.log(result)

                    if (result.status) {
                        this.pwd = "";
                        this.$emit("register", {
                            email: this.email,
                            first_name: result["first_name"],
                            last_name: result['last_name'],
                            reg_status: result['Successfully Registered. Please login now!']
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
