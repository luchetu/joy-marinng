import axios from "axios";
const Auth = {
  login: (data, successCb, failCb) => {
      axios.post('/admin-login', data).then(response => {
          successCb(response);
      }).catch(err => {
          failCb(err);
      });
  },
  logout: (successCb, failCb) => {
      axios.get('/admin-logout', {headers: {Authorization: 'Bearer ' + localStorage.getItem("user.api_token")}})
          .then(response => {
              localStorage.clear();
              successCb(response);
          }).catch(err => {
              failCb(err);
          alert(err.response.data.message);
      });
  },
  checkAuth: (successCb, failCb) => {
      axios.get('/admin-check-auth', {headers: {Authorization: 'Bearer ' + localStorage.getItem("user.api_token")}})
          .then(response => {
            successCb(response);
          }).catch(err => {
            failCb(err);
      });
  }
};
export default Auth;