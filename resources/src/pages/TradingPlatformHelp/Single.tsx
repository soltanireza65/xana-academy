import { ChakraProvider, GridItem, SimpleGrid } from "@chakra-ui/react";
import { QueryClient, QueryClientProvider } from "@tanstack/react-query";
import { createRoot } from "react-dom/client";
import { BrowserRouter, Routes, Route } from "react-router-dom";

import Content from "../../components/help/Content";
import Sidebar from "../../components/help/Sidebar";
const container = document.getElementById("single_help");
const root = createRoot(container!);

const Single = () => {
  return (
    <SimpleGrid columns={{ base: 1, md: 2, lg: 3 }} spacing={10}>
      <GridItem colSpan={{ base: 1, md: 1, lg: 1 }}>
        <Sidebar />
      </GridItem>
      <GridItem colSpan={{ base: 1, md: 1, lg: 2 }}>
        <Content />
      </GridItem>
    </SimpleGrid>
  );
};

const SingleHelpContainer = () => {
  const queryClient = new QueryClient();
  return (
    <QueryClientProvider client={queryClient}>
      <ChakraProvider>
        <BrowserRouter>
          <Routes>
            {/* <Route
              path="/XaniisTradingPlatformhelp/land"
              element={
                <SimpleGrid columns={{ base: 1, md: 2, lg: 3 }} spacing={10}>
                  <GridItem colSpan={{ base: 1, md: 1, lg: 1 }}>
                    <Sidebar />
                  </GridItem>
                  <GridItem colSpan={{ base: 1, md: 1, lg: 2 }}>
                  </GridItem>
                </SimpleGrid>
              }
            /> */}
            <Route
              path="/XaniisTradingPlatformhelp/:slug"
              element={<Single />}
            />
          </Routes>
        </BrowserRouter>
      </ChakraProvider>
    </QueryClientProvider>
  );
};

root.render(<SingleHelpContainer />);

export default Single;
