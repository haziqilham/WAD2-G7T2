var pomodoro = {
    started: false,
    minutes: 0,
    seconds: 0,
    fillerHeight: 0,
    fillerIncrement: 0,
    interval: null,
    minutesDom: null,
    secondsDom: null,
    fillerDom: null,
    init: function () {
        var self = this;
        this.minutesDom = document.querySelector('#minutes');
        this.secondsDom = document.querySelector('#seconds');
        this.fillerDom = document.querySelector('#filler');
        this.interval = setInterval(function () {
            self.intervalCallback.apply(self);
        }, 1000);
        document.querySelector('#work').onclick = function () {
            self.startWork.apply(self);
        };
        document.querySelector('#shortBreak').onclick = function () {
            self.startShortBreak.apply(self);
        };
        document.querySelector('#longBreak').onclick = function () {
            self.startLongBreak.apply(self);
        };
        document.querySelector('#stop').onclick = function () {
            self.stopTimer.apply(self);
        };
    },
    resetVariables: function (mins, secs, started) {
        this.minutes = mins;
        this.seconds = secs;
        this.started = started;
        this.fillerIncrement = 200 / (this.minutes * 60);
        this.fillerHeight = 0;
    },
    startWork: function () {
        this.resetVariables(25, 0, true);
    },
    startShortBreak: function () {
        this.resetVariables(5, 0, true);
    },
    startLongBreak: function () {
        this.resetVariables(15, 0, true);
    },
    stopTimer: function () {
        this.resetVariables(25, 0, false);
        this.updateDom();
    },
    toDoubleDigit: function (num) {
        if (num < 10) {
            return "0" + parseInt(num, 10);
        }
        return num;
    },
    updateDom: function () {
        this.minutesDom.innerHTML = this.toDoubleDigit(this.minutes);
        this.secondsDom.innerHTML = this.toDoubleDigit(this.seconds);
        this.fillerHeight = this.fillerHeight + this.fillerIncrement;
        this.fillerDom.style.height = this.fillerHeight + 'px';
    },
    intervalCallback: function () {
        if (!this.started) return false;
        if (this.seconds == 0) {
            if (this.minutes == 0) {
                this.timerComplete();
                return;
            }
            this.seconds = 59;
            this.minutes--;
        } else {
            this.seconds--;
        }
        this.updateDom();
    },
    timerComplete: function () {
        this.started = false;
        this.fillerHeight = 0;
    }
    
};

//START Weather api icon

    weather_states = {
        801:"./photos/icons/cloudy-day-1.svg",
        803: "./photos/icons/cloudy.svg",
        800: "./photos/icons/day.svg",
        500:"./photos/icons/rainy-3.svg",
        501:"./photos/icons/rainy-3.svg",
        502:"./photos/icons/rainy-4.svg",
        503:"./photos/icons/rainy-4.svg",
        200: "./photos/icons/thunder.svg",
        201: "./photos/icons/thunder.svg",
        202: "./photos/icons/thunder.svg"            
        
    };
    // console.log(801 in weather_states)
    // console.log(weather_states[801])

    var apikey = "d17573f39372d2a5b3bfef1f86c618f7"
    var city = "Singapore"
    var url = "https://api.openweathermap.org/data/2.5/weather"
    var imgurl = "https://openweathermap.org/img/wn/"
    var imgurl2 = "@2x.png"

    axios.get(url, {
        params: {
            q: city,
            APPID: apikey
        }
    })
        .then(response => {
            console.log(response)
            console.log(response.data.weather[0].description)
            console.log(response.data.weather[0].icon)
          
            console.log(response.data.weather[0].id)
            var weatherID = (response.data.weather[0].id)
        
           
            document.getElementById("weather").innerHTML = response.data.weather[0].description.toUpperCase();
             // adds animated icon if avail in current mapping 
            if(weatherID in weather_states){
                var animatedURL = (weather_states[weatherID])
                console.log(animatedURL)
                document.getElementById("image").src = weather_states[weatherID];

                console.log(String(weatherID));
            }
            // uses default openapiweathermap if does not exist
            else{
                var imgurl3 = imgurl + response.data.weather[0].icon + imgurl2;
                document.getElementById("image").src = imgurl3;
            }
            
        })
        .catch(error => {
            console.log(error.message)
            data = "Invalid"
        });

        
// END  weather api icon



window.onload = function () {
    pomodoro.init();
    
};



