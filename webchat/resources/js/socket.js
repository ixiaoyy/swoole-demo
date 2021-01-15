// 通过 Socket.io 客户端发起 WebSocket 请求
import io from 'socket.io-client';
import store from "./store";
let api_token = store.state.userInfo.token;
const socket = io('http://119.45.0.49?api_token=' + api_token);
export default socket;
