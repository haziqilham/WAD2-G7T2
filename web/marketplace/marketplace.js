const app = Vue.createApp({
    data() {
        return {
            allData:{},
            listName: '',
            price:0,
            description: '',
            currId : null
        }
    },
    methods: {
        //format
        fetchAllData(){
            axios.get('retrieveData.php')
            
            .then(response => {
                this.allData = response.data;
                console.log(this.allData.length)
                console.log(this.currId)
                
                    // this.listname = response.data[x].listname
                })
               
            .catch(error => {
            })
        },

        storeId(event) {
            this.currId = event.target.getAttribute('value')
            // console.log(this.currId)
            sessionStorage.setItem("id", this.currId)
            location.href="viewlisting.html"
        },

       
        
    },
    beforeMount(){
        this.currId = sessionStorage.getItem("id")
    },

    created:function(){
        this.fetchAllData();
         
    }
})

const vm = app.mount('#app')








