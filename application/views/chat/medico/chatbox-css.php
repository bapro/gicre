<style>
.messanger {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
}

.messanger .messages {
  -webkit-box-flex: 1;
      -ms-flex: 1;
          flex: 1;
  margin: 10px 0;
  padding: 0 10px;
  max-height: 460px;
  overflow-y: auto;
  overflow-x: hidden;
}

.messanger .messages .message {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  margin-bottom: 15px;
  -webkit-box-align: start;
      -ms-flex-align: start;
          align-items: flex-start;
}

.messanger .messages .message.me {
  -webkit-box-orient: horizontal;
  -webkit-box-direction: reverse;
      -ms-flex-direction: row-reverse;
          flex-direction: row-reverse;
}

.messanger .messages .message.me img {
  margin-right: 0;
  margin-left: 15px;
}

.messanger .messages .message.me .info {
  background-color: #009688;
  color: #FFF;
}

.messanger .messages .message.me .info:before {
  display: none;
}

.messanger .messages .message.me .info:after {
  position: absolute;
  right: -13px;
  top: 0;
  content: "";
  width: 0;
  height: 0;
  border-style: solid;
  border-width: 0 16px 16px 0;
  border-color: transparent #009688 transparent transparent;
  -webkit-transform: rotate(270deg);
      -ms-transform: rotate(270deg);
          transform: rotate(270deg);
}

.messanger .messages .message img {
  border-radius: 50%;
  margin-right: 15px;
}

.messanger .messages .message .info {
  margin: 0;
  background-color: #ddd;
  padding: 5px 10px;
  border-radius: 3px;
  position: relative;
  -ms-flex-item-align: start;
      align-self: flex-start;
}

.messanger .messages .message .info:before {
  position: absolute;
  left: -14px;
  top: 0;
  content: "";
  width: 0;
  height: 0;
  border-style: solid;
  border-width: 0 16px 16px 0;
  border-color: transparent #ddd transparent transparent;
}

.messanger .sender {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
}

.messanger .sender input[type="text"] {
  -webkit-box-flex: 1;
      -ms-flex: 1;
          flex: 1;
  border: 1px solid #009688;
  outline: none;
  padding: 5px 10px;
}

.messanger .sender button {
  border-radius: 0;
}
.tile {
  position: relative;
  background: #ffffff;
  border-radius: 3px;
  padding: 20px;
  -webkit-box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
          box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
  margin-bottom: 30px;
  -webkit-transition: all 0.3s ease-in-out;
  -o-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}

</style>
