import { Box, ChakraProvider, SkeletonText, Text } from "@chakra-ui/react";
import { QueryClient, QueryClientProvider } from "@tanstack/react-query";
import _ from "lodash";
import { useEffect } from "react";
import { createRoot } from "react-dom/client";
import useGetCustomerDownloadables from "../../hooks/useGetCustomerDownloadables";
import {
  Accordion,
  AccordionItem,
  AccordionButton,
  AccordionPanel,
  AccordionIcon,
} from "@chakra-ui/react";
import ReactPlayer from "react-player";

const container = document.getElementById("woo_product_downloads");
const root = createRoot(container!);

const Downloads = () => {
  const { Downloadables, isError, isLoading } = useGetCustomerDownloadables();

  const grouped = _.groupBy(Downloadables, "product_id");
  useEffect(() => {
    console.log("grouped", grouped);
  }, [Downloadables, grouped]);
  return (
    <Box>
      <Accordion allowToggle>
        {Object.keys(grouped).map((key) => {
          return (
            <AccordionItem mt="4">
              <AccordionButton
                _focus={{ outline: "none" }}
                _active={{ outline: "none" }}
                backgroundColor="gray.100"
              >
                <Box flex="1" textAlign="right">
                  {grouped[key][0].product_name}
                </Box>
                <AccordionIcon />
              </AccordionButton>
              <AccordionPanel pb={4} px="0">
                {grouped[key].map((item) => {
                  return (
                    <Box>
                      <Text bg="gray.50" pr="2" px="" py="3">
                        {item.download_name}
                      </Text>
                      <Box bg="gray.50" mr="" p="" my="3">
                        <ReactPlayer
                          url={item.download_url}
                          //   playing={true}

                          controls
                          light
                          width="100%"
                          height="100%"
                          style={{ maxWidth: "100%" }}
                          progressInterval={1000}
                          //   playIcon={<div>Play</div>}
                          config={{
                            file: {
                              attributes: {
                                onContextMenu: (e: any) => e.preventDefault(),
                                controlsList: "nodownload",
                              },
                            },
                          }}
                          //   onContextMenu={(e) => e.preventDefault()}
                        />
                      </Box>
                    </Box>
                  );
                })}
              </AccordionPanel>
            </AccordionItem>
          );
        })}
      </Accordion>
      {isLoading && (
        <Box>
          {/* <Skeleton height="64" /> */}
          <SkeletonText mt="4" noOfLines={15} spacing="4" />
        </Box>
      )}
    </Box>
  );
};

const DownloadsContainer = () => {
  const queryClient = new QueryClient();

  return (
    <QueryClientProvider client={queryClient}>
      <ChakraProvider>
        <Downloads />
      </ChakraProvider>
    </QueryClientProvider>
  );
};

root.render(<DownloadsContainer />);

export default Downloads;
