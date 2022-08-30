// @ts-nocheck - may need to be at the start of file
import { ChakraProvider, Text } from "@chakra-ui/react";
import { QueryClient, QueryClientProvider } from "@tanstack/react-query";
import { createRoot } from "react-dom/client";
import { BrowserRouter, Route, Routes } from "react-router-dom";
// import "./pages/help/Single";
// import "./pages/downloads/Downloads";
import Single from "./pages/help/Single";

// xanaClient
//   .post(
//     xana.ajaxUrl,
//     qs.stringify({
//       action: "getCustomerDLs",
//       ajax_nonce: xana.ajax_nonce,
//     })
//   )
//   .then(function (response) {
//     console.log(response);
//   })
//   .catch(function (error) {
//     console.log(error);
//   });
