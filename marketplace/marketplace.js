



const app = Vue.createApp({
    data() {
        return {
            allData:{}
            //name:value pairs
        }
    },
    methods: {
        //format
        fetchAllData(){
            axios.get('retrieveData.php')
            
            .then(response => {
                this.allData = response.data;
                console.log(typeof this.allData)
                
               
               
                
                
            })
            .catch(error => {
                
            })
        }
    },
    created:function(){
        this.fetchAllData();
        
        
        
        
    }
})

const vm = app.mount('#app')



