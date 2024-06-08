
<template>
    <div>
        <!-- <div v-if="loading" class="loading-spinner">
            Loading...
        </div> -->
        <ul class="chat">
            <li class="left clearfix" v-for="message in messages" :key="message.id">
                <div class="clearfix">
                    <div class="header">
                        <strong>
                            <!-- {{ message.user }} -->
                            {{ message.user.name }}
                        </strong>
                    </div>
                    <p>
                        {{ message.message }}
                    </p>
                </div>
            </li>
        </ul>

        <!-- Render the pagination links -->
        <!-- <nav v-if="messages.last_page > 1">
            <ul class="pagination">
                <li v-if="messages.current_page > 1">
                    <a @click="fetchPage(messages.current_page - 1)" href="#">Previous</a>
                </li>
                <li v-for="page in messages.last_page" :key="page" :class="{ active: page === messages.current_page }">
                    <a @click="fetchPage(page)" href="#">{{ page }}</a>
                </li>
                <li v-if="messages.current_page < messages.last_page">
                    <a @click="fetchPage(messages.current_page + 1)" href="#">Next</a>
                </li>
            </ul>
        </nav> -->
    </div>
</template>
<script>
export default {
    props: ["messages"],

    //     mounted() {
    //     this.fetchPage(1); // Fetch the initial page of messages
    //     // Subscribe to the channel and listen for the MessageSent event
    //     window.Echo.private('chat').listen('.MessageSent', (event) => {
    //       // Handle the received event
    //       // You may need to update this logic based on your application's requirements
    //       this.fetchPage(this.messages.current_page); // Fetch the current page to update the messages
    //     });
    //   },
    //   methods: {
    //     fetchPage(page) {
    //       axios.get(`/messages?page=${page}`).then((response) => {
    //         this.messages = response.data;
    //       }).catch((error) => {
    //         console.log(error);
    //       });
    //     },
    //   },

};
</script>

<!-- <script>
export default {
    props: ["messages"],
    data() {
        return {
            messages: {},
        };
    },
    mounted() {
        this.fetchPage(1); // Fetch the initial page of messages
        // Subscribe to the channel and listen for the MessageSent event
        window.Echo.private(`messages.${channelId}`).listen('.MessageSent', (event) => {
            // Handle the received event
            // You may need to update this logic based on your application's requirements
            this.fetchPage(this.messages.current_page); // Fetch the current page to update the messages
        });
    },
    methods: {
        fetchPage(page) {
            axios.get(`/messages?page=${page}`).then((response) => {
                this.messages = response.data;
            }).catch((error) => {
                console.log(error);
            });
        },
    },
};
</script> -->
