import axios from "axios";

axios.defaults.baseURL = "http://localhost:8000/";

const responseBody = (response) => response.data;

const requests = {
  get: (url) => axios.get(url).then(responseBody),
  post: (url, body) => axios.post(url, body).then(responseBody),
  put: (url, body) => axios.put(url, body).then(responseBody),
  delete: (url) => axios.delete(url).then(responseBody),
};

const GetProducts = {
  getProducts: () => requests.get("/api/products"),
};

const agent = {
  GetProducts,
};

export default agent;