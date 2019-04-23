

require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',
    data:{
        test:'ສົ່ງຂໍ້ມູນ ໂດຍການໃຊ້ Vue js ແລະ Axios',
        name:'',
        email:'',
        subject:'',
        message:''
    },
    methods: {
        addPost(){
            axios.post('/page/post',
                {name:this.name,email:this.email,subject:this.subject,message:this.message}).then(post=>this.$emit('completed',name));
        },
    },
});
