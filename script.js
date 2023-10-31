const { createApp } = Vue;

createApp({

data(){
    return{
        title: 'Todo List',
        list: []
    }
},

    methods:{
        getList(){
            console.log('LIST');
            axios.get('server.php')
            .then(result => {
                this.list = result.data;
                console.log(this.list);
            })
        }
    },
    mounted(){
        this.getList();
    }

}).mount('#app');   