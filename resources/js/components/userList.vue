<template>
  <div>
    <li
      :class="user.id == $store.state.user.id ? 'active' : ''"
      v-for="(user, index) in usres"
      :key="index"
      @click="getMessage(user)"
    >
      <div class="d-flex bd-highlight">
        <div class="img_cont">
          <img
            src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg"
            class="rounded-circle user_img"
          />
          <span class="online_icon"></span>
        </div>
        <div class="user_info">
          <span>{{ user.name }}</span>
          <p>Kalid is online</p>
        </div>
      </div>
    </li>
  </div>
</template>

<script>
export default {
  props: ["usres"],
  data() {
    return {};
  },
  methods: {
    getMessage(user) {
      let _this = this;
      axios
        .get(`/get-message/${user.id}`)
        .then(function (response) {
          // handle success
          console.log(response);
          _this.$store.commit("getUserMessage", {
            messages: response.data.messages,
            user: user,
          });
        })
        .catch(function (error) {
          console.log(error);
        });
    },
  },
};
</script>

<style>
</style>