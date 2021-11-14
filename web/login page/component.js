
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
                window.location.href = '../index.html';
            }
        },
        doRegisterSuccess(userInfo) {
            this.user = userInfo;
            console.log(this.user)
            window.location.href = '../login page/login.html';


        },

        // event handler for logout button
        doLogout() {
            this.user = null;
            console.log('logout')
            sessionStorage.removeItem('user')
            window.location.href = '../index.html';
        },

        doProfileUpdateSuccess(userInfo){
            this.user = userInfo;
            // sessionStorage.removeItem('user')
            console.log(this.user)
            // sessionStorage.setItem("user",  JSON.stringify(this.user))

        },
        doPassworddUpdateSuccess(userInfo){
            console.log('Success')
            this.user = userInfo;
            console.log(this.user)
        }

    }, // methods
    mounted(){
        if (sessionStorage.user){
            var user_info = JSON.parse(sessionStorage.user)
            this.user = {'email': user_info.userid, 'first_name':user_info.first_name, 'last_name':user_info.last_name}
        }
    }
});


app.component('my-login', {
    // props : ['user'],

    emits: ['login'],

    template: `<div class="container mb-3 ">
                <div>
                    <div class="row" style="margin-top: 40px;">
                        <div class="col-8" style="text-align: left;">
                            <h4>Welcome to StudySite! Please login.</h4>
                        </div>
                        <div class="col-4" style="text-align: right;">
                            <h6 style="font-size: 14px;" class="text-right">New member? <a href="register.html">Register</a> here.</h6>
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
                                <button v-on:click='doLogin' class="btn btn-dark" style="height:10;width:200px; margin:auto;">Login</button>
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
                        document.getElementById("msg").innerHTML = "<h4>Login Failed</h4>"
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
                            <button v-on:click='doRegister' class="btn btn-dark" style="height:10;width:200px; margin:auto;">SIGN UP</button>
                            </form>


                        </div>


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
                        this.message = 'Registration Failed'
                        document.getElementById("msg").innerHTML = "<h4>Registration Failed</h4>"
                    }
                })
                .catch((error) => {
                    this.message = "Error"
                })

        }

    },



}
),


app.component('profile-update', {
    // props : ['prop1', 'prop2'],

    emits: ['profileupdate'],

    template: `<div class="row" style="margin-top: 100px;">
                    <h2>Enter New Particulars</h2>
                    <div class="row mt-2">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="first_name" v-model='first_name' required>
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="last_name"  v-model='last_name' required>
                    </div>

                    <h6 style='margin-top:5px;'>Note: You will need to login again to view the updated changes</h6>
                    <div class="mt-5 text-center"><button class="btn btn-dark profile-button" type="button" v-on:click='doProfileUpdate'>Save
                            Profile</button></div>
                </div>`,

    data() {
        return {
            email: '',
            first_name: '',
            last_name: '',
            message: ''
        }
    },

    methods: {
        doProfileUpdate() {
            let user_info = JSON.parse(sessionStorage.user)
            console.log(user_info)
            axios
                .post("../services/process_update_profile.php", {
                    email: user_info.userid,
                    first_name: this.first_name,
                    last_name: this.last_name
                })
                .then((response) => {
                    let result = response.data
                    console.log(result)

                    if (result.status) {
                        let ele = document.getElementById("update_profile")
                        ele.lastChild.innerHTML = "<h6>Profile Updated</h6>"

                        this.first_name = "";
                        this.last_name = "";
                        this.$emit("profileupdate", {
                            email: user_info.userid,
                            first_name: result["first_name"],
                            last_name: result['last_name'],
                        })

                    }

                    else {
                        this.message = 'Failed'
                    }
                })
                .catch((error) => {
                    this.message = "Error"
                    console.log(error)
                })

        },


    },



}
),
app.component('password-update', {
    // props : ['prop1', 'prop2'],

    emits: ['passwordupdate'],

    template: `<div class="row" style="margin-top: 100px;">
                    <h2>Enter New Password</h2>
                    <div class="row mt-2">
                        <div class="mb-3">
                            <label for="password" class="form-label">Old Password</label>
                            <input type="password" class="form-control" name="password" v-model='old_pwd' required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" class="form-control" name="password" v-model='new_pwd' required>
                        </div>

                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password"
                                v-model='confirm_pwd' required>
                        </div>

                    </div>

                    <div class="mt-5 text-center"><button class="btn btn-dark profile-button" type="button" v-on:click='doPasswordUpdate'>Change
                            Password</button></div>
                    <div id='msg></div>
                </div>`,

    data() {
        return {
            email: '',
            old_pwd: '',
            new_pwd: '',
            confirm_pwd: "",
            message: ''
        }
    },

    methods: {
        doPasswordUpdate(){
            var user_info = JSON.parse(sessionStorage.user)
            axios
            .post("../services/process_update_password.php", {
                email: user_info.userid,
                old_pwd: this.old_pwd,
                new_pwd: this.new_pwd,
                confirm_pwd: this.confirm_pwd,

            })
            .then((response) => {
                let result = response.data
                console.log(result)

                if (result !== null) {
                    let ele = document.getElementById("update_password")
                    ele.lastChild.innerHTML = "<h6>Password Updated</h6>"                    
                    this.$emit("passwordupdate", {
                        email: this.email,
                    },
                    )
                }

                else {
                    let ele = document.getElementById("update_password")
                    ele.lastChild.innerHTML = "<h6>Failed to change password.</h6>"                  }
            })
            .catch((error) => {
                this.message = "Error"
            })
        }

    },



}
)

)

const vm = app.mount("#app");
