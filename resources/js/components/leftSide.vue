<template>
  <div class="card mb-sm-3 mb-md-0 contacts_card">
    <div class="card-header">
      <div class="input-group">
        <input
          type="text"
          placeholder="Search..."
          name=""
          class="form-control search"
        />
        <div class="input-group-prepend">
          <span class="input-group-text search_btn"
            ><i class="fas fa-search"></i
          ></span>
        </div>
      </div>
    </div>
    <div class="card-body contacts_body">
      <ul class="contacts">
        <userlist :usres="users"></userlist>
      </ul>
    </div>
    <div class="card-footer"></div>
  </div>
</template>

<script>
import userlist from "./userList";
export default {
  components: {
    userlist,
  },
  data() {
    return {
      users: [],
    };
  },
  mounted() {
    let _this = this;
    axios
      .get("/get-user")
      .then(function (response) {
        _this.users = response.data.users;
      })
      .catch(function (error) {
        console.log(error);
      });
  },
};
</script>

<style>
</style>