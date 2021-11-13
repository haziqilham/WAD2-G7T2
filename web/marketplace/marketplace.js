const app = Vue.createApp({
    data() {
        return {
            allData:{},
            listName: '',
            price:0,
            description: '',
            currId : 0
        }
    },
    methods: {
        //format
        fetchAllData(){
            axios.get('retrieveData.php')
            
            .then(response => {
                this.allData = response.data;
                console.log(this.allData.length)
                
                

                    // this.listname = response.data[x].listname
             
                })
               
                
    
            .catch(error => {
                
            })

        },

        counter(){
            this.currID ++
            console.log(this.currId)
        }
    },
    created:function(){
        this.fetchAllData();
         
    }
})

const vm = app.mount('#app')








