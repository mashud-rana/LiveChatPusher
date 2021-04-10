<template>
  <div>
    <div v-for="(mess, index) in getMessages" :key="index">
      <div
        class="d-flex mb-4"
        :class="
          mess.message_to == $store.state.user.id
            ? 'justify-content-end'
            : 'justify-content-start'
        "
      >
        <div class="img_cont_msg">
          <img
            src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg"
            class="rounded-circle user_img_msg"
          />
        </div>
        <div class="msg_cotainer">
          {{ mess.message }}
          <span class="msg_time">8:40 AM, Today</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  created() {
    let _this = this;
    Echo.channel("new-message").listen("NewMessage", (e) => {
      console.log(e.message_to + "first");
      console.log(_this.$store.state.user.id + "second");
      // this.message.push(e.message);
      if (
        e.message_to == _this.$store.state.user.id ||
        e.message_from == _this.$store.state.user.id
      ) {
        _this.$store.commit("updateNewMessage", e);
      } else {
        console.log("not done");
      }
    });
  },
  computed: {
    getMessages() {
      return this.$store.state.message;
    },
  },
};
</script>

<style>
</style>