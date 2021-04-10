<template>
  <div>
    <div class="card">
      <div class="card-header msg_head">
        <div class="d-flex bd-highlight">
          <div class="img_cont">
            <img
              src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg"
              class="rounded-circle user_img"
            />
            <span class="online_icon"></span>
          </div>
          <div class="user_info">
            <span>{{ $store.state.user.name }}</span>
            <p>{{ $store.state.message.length }} Messages</p>
          </div>
          <div class="video_cam">
            <span><i class="fas fa-video"></i></span>
            <span><i class="fas fa-phone"></i></span>
          </div>
        </div>
        <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
        <div class="action_menu">
          <ul>
            <li><i class="fas fa-user-circle"></i>{{ user.name }}</li>
            <li><i class="fas fa-users"></i> Add to close friends</li>
            <li><i class="fas fa-plus"></i> Add to group</li>
            <li @click="logout()"><i class="fas fa-ban"></i>Logout</li>
            <form id="logout-form" action="" method="POST" class="d-none">
              @csrf
            </form>
          </ul>
        </div>
      </div>
      <div class="card-body msg_card_body" v-chat-scroll>
        <message></message>
      </div>
      <div class="card-footer">
        <writeMessage></writeMessage>
      </div>
    </div>
  </div>
</template>

<script>
import message from "./message";
import writeMessage from "./writeMessage";
export default {
  props: ["user"],
  components: {
    message: message,
    writeMessage: writeMessage,
  },
  methods: {
    logout() {
      axios
        .post("/logout")
        .then(function (response) {
          location.reload();
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