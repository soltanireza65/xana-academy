import {
  Accordion,
  AccordionButton,
  AccordionIcon,
  AccordionItem,
  AccordionPanel,
  Box,
  Button,
  Collapse,
  Flex,
  IconButton,
  ListItem,
  Skeleton,
  Stack,
  Text,
  UnorderedList,
  useDisclosure,
} from "@chakra-ui/react";
import _, { range } from "lodash";
import { useMediaQuery } from "@chakra-ui/react";
import { useEffect, useState } from "react";
import { Link, useHref, useNavigate, useParams } from "react-router-dom";
import useGetHelpMenu from "../../hooks/useGetHelpMenu";
import useGetLocationProps from "../../hooks/useGetLocationProps";
import { FcMenu } from "react-icons/fc";
import { IMenuItem } from "../../types/menu";

const Sidebar = () => {
  let { slug } = useParams<{
    slug: string;
  }>();
  const { helpMenu, isError, isLoading, refetchHelpMenu } = useGetHelpMenu();

  const [isSm] = useMediaQuery("(min-width: 30rem)");
  const [isMd] = useMediaQuery("(min-width: 48rem)");
  const [isLg] = useMediaQuery("(min-width: 62rem)");
  const [isXl] = useMediaQuery("(min-width: 80rem)");

  const parrentMenuItems = _.filter(
    helpMenu,
    (x) => x.menu_item_parent === "0"
  );
  const childMenuItems = _.filter(helpMenu, (x) => x.menu_item_parent !== "0");

  const [openItemIndex, setOpenItemIndex] = useState(0);

  useEffect(() => {
    helpMenu?.map((item) => {
      if (`${slug}/` == item.url.split("/XaniisTradingPlatformhelp/")[1]) {
        setOpenItemIndex(
          parrentMenuItems.findIndex((x) => x.ID === +item.menu_item_parent)
        );
      }
    });
  }, [helpMenu, slug]);

  const navigate = useNavigate();
  const [open, setOpen] = useState(true);

  return (
    <Box
      border="1px"
      borderColor="gray.200"
      borderRadius={12}
      fontFamily="iransans"
      backgroundColor="white"
      // height={{
      //   base: "100%",
      //   sm: "100%",
      //   md: "100%",
      //   // lg: "70vh",
      // }}
      // overflowX="auto"
    >
      <>
        <Flex alignItems="center" m="4">
          <Text fontSize="20">فهرست عناوین</Text>
          <IconButton
            icon={<FcMenu />}
            _active={{ outline: "none" }}
            _focus={{ outline: "none" }}
            mr="auto"
            variant="ghost"
            onClick={() => setOpen(!open)}
            aria-label={""}
          />
        </Flex>
        <Collapse in={open} animateOpacity>
          <Accordion
            index={[openItemIndex]}
            // height={{
            //   base: "100%",
            //   sm: "100%",
            //   md: "100%",
            //   lg: "60vh",
            // }}
            // overflowX="auto"
          >
            {parrentMenuItems?.map((parrentItem, parrentItemIndex) => {
              return (
                <AccordionItem
                  key={parrentItem.ID}
                  onClick={() => setOpenItemIndex(parrentItemIndex)}
                >
                  <AccordionButton _focus={{ outline: "none" }}>
                    <Box flex="1" textAlign="right">
                      {parrentItem.title}
                    </Box>
                    <AccordionIcon />
                  </AccordionButton>
                  <AccordionPanel pb={4}>
                    <UnorderedList borderRight="1px solid gray" mr="2">
                      {childMenuItems
                        .filter((x) => +x.menu_item_parent === parrentItem.ID)
                        .map((item) => {
                          return (
                            <ListItem
                              cursor="pointer"
                              key={item.url}
                              listStyleType="none"
                              _hover={{
                                backgroundColor: "gray.100",
                              }}
                              bg={
                                `${slug}/` ==
                                item.url.split("/XaniisTradingPlatformhelp/")[1]
                                  ? "gray.100"
                                  : "white"
                              }
                              onClick={() => {
                                navigate(
                                  `/XaniisTradingPlatformhelp/${
                                    item.url.split(
                                      "/XaniisTradingPlatformhelp/"
                                    )[1]
                                  }`
                                );
                              }}
                              py="2"
                              pr="4"
                              mr="1"
                              my="1"
                            >
                              <Link
                                to={`/XaniisTradingPlatformhelp/${
                                  item.url.split(
                                    "/XaniisTradingPlatformhelp/"
                                  )[1]
                                }`}
                                style={{
                                  textDecoration: "none",
                                  width: "100%",
                                  color:
                                    `${slug}/` ==
                                    item.url.split(
                                      "/XaniisTradingPlatformhelp/"
                                    )[1]
                                      ? "green"
                                      : "black",
                                }}
                              >
                                {item.title}
                              </Link>
                            </ListItem>
                          );
                        })}
                    </UnorderedList>
                  </AccordionPanel>
                </AccordionItem>
              );
            })}
          </Accordion>
          {isLoading && <LoadingSkeleton />}
        </Collapse>
      </>
    </Box>
  );
};

export default Sidebar;

const LoadingSkeleton = () => {
  return (
    <Box p="4">
      <Stack>
        {range(0, 10).map((x, i) => (
          <Skeleton
            key={i}
            height="20px"
            colorScheme="blackAlpha"
            borderRadius={5}
          />
        ))}
      </Stack>
    </Box>
  );
};
