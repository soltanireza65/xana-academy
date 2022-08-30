import { Box, Image, Text } from "@chakra-ui/react";
import { useParams } from "react-router-dom";
import useGetHelp from "../../hooks/useGetHelp";
import { Skeleton, SkeletonCircle, SkeletonText } from "@chakra-ui/react";

const Content = () => {
  let { slug } = useParams<{
    slug: string;
  }>();

  const { help, isError, isLoading, refetchHelp } = useGetHelp({ slug: slug! });

  return (
    <>
      {slug !== "landing" && (
        <Box border="1px" p="12" borderColor="gray.200" borderRadius={12}>
          {/* <Text>{help?.title.rendered}</Text> */}
          {/* <Image src={help?.featured_media} /> */}
          <Box
            textAlign="justify"
            fontFamily="IranSans"
            fontSize="14px"
            fontStyle="normal"
            lineHeight="2rem"
            dangerouslySetInnerHTML={{ __html: help?.content.rendered! }}
          />
          {isLoading && (
            <Box>
              <Skeleton height="64" />
              <SkeletonText mt="4" noOfLines={15} spacing="4" />
            </Box>
          )}
        </Box>
      )}
    </>
  );
};

export default Content;
