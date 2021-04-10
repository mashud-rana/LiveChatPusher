<template>
  <div>
    <div class="input-group">
      <div class="input-group-append">
        <span class="input-group-text attach_btn"
          ><i class="fas fa-paperclip"></i
        ></span>
      </div>
      <textarea
        name=""
        class="form-control type_msg"
        placeholder="Type your message..."
        v-model="message"
        v-on:keyup.enter="sendMessage"
      ></textarea>
      <div class="input-group-append" @click="sendMessage">
        <span class="input-group-text send_btn"
          ><i class="fas fa-location-arrow"></i
        ></span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      message: "",
    };
  },

  methods: {
    sendMessage() {
      let _this = this;
      if (this.$store.state.user.id) {
        axios
          .post("/send-new-message", {
            message: this.message,
            to: this.$store.state.user.id,
          })
          .then(function (response) {
            console.log(response.data.message);
            _this.$store.commit("sendNewMessage", {
              message: response.data.message,
            });
            _this.message = "";
          })
          .catch(function (error) {
            console.log(error);
          });
      } else {
        alert("Please Select someone");
      }
    },
  },
};
</script>

<style>
</style>