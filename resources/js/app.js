

require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',
    data:{
        test:'ຕິດຕໍ່ພວກເຮົາ',
        responsemsg:'',
        enquiries:[],
        search:''
    },
    ready:function(){
        this.created();
    },
    created(){
        axios.get('/admin/get-enquiries')
        .then(response =>{
            this.enquiries = response.data;
        })
    },
    computed:{
        filtersEnquiries(){
            return this.enquiries.filter(enquiry=>{
                return enquiry.name.toLowerCase().includes(this.search.toLowerCase());
            });
        }
    },
    methods: {
        addPost(){
            axios.post('/page/post',
                {name:this.name,email:this.email,subject:this.subject,message:this.message})
                // .then(post=>this.$emit('completed',name));
                .then(function(response){
                    alert(response.data);
                    app.responsemsg = response.data;
                })
        },
    },
});
