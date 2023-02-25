import { ChakraProvider, GridItem, SimpleGrid } from "@chakra-ui/react";
import { QueryClient, QueryClientProvider } from "@tanstack/react-query";
import { createRoot } from "react-dom/client";
import { BrowserRouter, Routes, Route } from "react-router-dom";

import Sidebar from "../../components/help/Sidebar";
const container = document.getElementById("archive_help");
const root = createRoot(container!);

const Archive = () => {
  return (
    <SimpleGrid columns={{ base: 1, md: 2, lg: 3 }} spacing={10}>
      <GridItem colSpan={{ base: 1, md: 1, lg: 1 }}>
        <Sidebar />
      </GridItem>
      <GridItem colSpan={{ base: 1, md: 1, lg: 2 }}></GridItem>
    </SimpleGrid>
  );
};

const ArchiveHelpContainer = () => {
  const queryClient = new QueryClient();
  return (
    <QueryClientProvider client={queryClient}>
      <ChakraProvider>
        <BrowserRouter>
          <Routes>
            <Route path="/xanis-trade-guide" element={<Archive />} />
          </Routes>
        </BrowserRouter>
      </ChakraProvider>
    </QueryClientProvider>
  );
};

root.render(<ArchiveHelpContainer />);

export default Archive;
