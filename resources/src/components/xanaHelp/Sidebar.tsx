import {
  Accordion,
  AccordionButton,
  AccordionIcon,
  AccordionItem,
  AccordionPanel,
  Box,
  Collapse,
  Flex,
  IconButton,
  ListItem,
  Skeleton,
  Stack,
  Text,
  UnorderedList
} from "@chakra-ui/react";
import _, { range } from "lodash";
import { useEffect, useState } from "react";
import { FcMenu } from "react-icons/fc";
import { Link, useNavigate, useParams } from "react-router-dom";
import useGetXanaHelpMenu from "../../hooks/useGetXanaHelpMenu";

const Sidebar = () => {
  let { slug } = useParams<{
    slug: string;
  }>();
  const { xanaHelpMenu, isLoading } = useGetXanaHelpMenu();

  const parrentMenuItems = _.filter(
    xanaHelpMenu,
    (x) => x.menu_item_parent === "0"
  );
  const childMenuItems = _.filter(
    xanaHelpMenu,
    (x) => x.menu_item_parent !== "0"
  );

  const [openItemIndex, setOpenItemIndex] = useState(0);

  useEffect(() => {
    xanaHelpMenu?.map((item) => {
      if (`${slug}/` == item.url.split("/XanaHelp/")[1]) {
        setOpenItemIndex(
          parrentMenuItems.findIndex((x) => x.ID === +item.menu_item_parent)
        );
      }
    });
  }, [xanaHelpMenu, slug]);

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
                                item.url.split("/XanaHelp/")[1]
                                  ? "gray.100"
                                  : "white"
                              }
                              onClick={() => {
                                navigate(
                                  `/XanaHelp/${
                                    item.url.split(
                                      "/XanaHelp/"
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
                                to={`/XanaHelp/${
                                  item.url.split(
                                    "/XanaHelp/"
                                  )[1]
                                }`}
                                style={{
                                  textDecoration: "none",
                                  width: "100%",
                                  color:
                                    `${slug}/` ==
                                    item.url.split(
                                      "/XanaHelp/"
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
