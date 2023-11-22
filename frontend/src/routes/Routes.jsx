import { createBrowserRouter, Navigate } from "react-router-dom";
import App from "../App";
import Products from "../products/Products";

export const router = createBrowserRouter([
  {
    path: "/",
    element: <App />,
    children: [
      { path: "/", element: <Navigate to={"/main/welcome"} /> },
      {
        path: "/main",
        children: [{ path: "products", element: <Products /> }],
      },
    ],
  },
]);
