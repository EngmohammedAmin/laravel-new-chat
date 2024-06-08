/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';


import { createApp } from 'vue';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({
    //Store chat messages for display in this array.
    data() {
        return {
            messages: [],
            loading: false,
        };

    },
    // mounted() {
    //     const typingInput = document.getElementById('typingInput');
    //     typingInput.addEventListener('input', () => {
    //         window.Echo.private('typingchat')
    //             .listenForWhisper('typing', (data) => {
    //                 // this.messages.push({
    //                 //     message: data.message.message,
    //                 //     user: data.user
    //                 // });
    //                 console.log(`User ${data.user.name} is typing.`);
    //             });
    //     });
    // },

    //Upon initialization, run fetchMessages().
    created() {
        this.fetchMessages();
        // this.fetchPage(1);
        window.Echo.private('chat')
            .listen('MessageSent', (e) => {
                // this.fetchPage(this.messages.current_page);
                this.messages.push({
                    message: e.message.message,
                    user: e.user
                });
                // document.getElementById('getmessage').innerHTML= "HELLO WORD";
                console.log('From :' + e.user.name);
            });

        // Echo.private('chat')
        //     .whisper('typing', (data) => {
        //         this.messages.push({
        //             message: data.message.message,
        //             user: data.user
        //         });
        //         console.log(`User ${data.user.name} is typing.`);
        //     });

    },
    methods: {
        // fetchPage(page) {
        //     axios.get(`/messages?page=${page}`).then((response) => {
        //       this.messages = response.data;
        //     }).catch((error) => {
        //       console.log(error);
        //     });
        //   },

        //   fetchNextPage() {
        //     if (this.messages.current_page < this.messages.last_page) {
        //       this.fetchPage(this.messages.current_page + 1);
        //     }
        //   },
        //   fetchPreviousPage() {
        //     if (this.messages.current_page > 1) {
        //       this.fetchPage(this.messages.current_page - 1);
        //     }
        //   },
        //   fetchPageByNumber(page) {
        //     if (page >= 1 && page <= this.messages.last_page) {
        //       this.fetchPage(page);
        //     }
        //   },

        fetchMessages() {
            this.loading = true;
            //GET request to the messages route in our Laravel server to fetch all the messages
            axios.get('/messages').then(response => {
                //Save the response in the messages array to display on the chat view
                this.messages = response.data;
                this.loading = false;
            });
        },
        //Receives the message that was emitted from the ChatForm Vue component
        addMessage(message) {
            //Pushes it to the messages array
            this.messages.push(message);
            //POST request to the messages route with the message data in order for our Laravel server to broadcast it.
            axios.post('/messages', message).then(response => {
                console.log(response.data);

            });
        }
    }
});


import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);

import ChatMessages from './components/ChatMessages.vue';
app.component('chat-messages', ChatMessages);
import ChatForm from './components/ChatForm.vue';
app.component('chat-form', ChatForm);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount('#app');


