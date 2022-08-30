import { useQuery } from "@tanstack/react-query";
import { IPost } from "../types/help";
import { xanaClient } from "./useAxiosFetch";

const useGetHelp = ({ slug }: { slug: string }) => {
  const { data, isLoading, isError, refetch } = useQuery(
    [`useGetHelp`, slug],
    async () => {
      const { data } = await xanaClient.request({
        method: "GET",
        url: `/wp/v2/help`,
        params: {
          slug: slug,
        },
      });

      return data[0] as IPost;
    },
    {
      refetchOnWindowFocus: false,
    }
  );
  return { help: data, isLoading, isError, refetchHelp: refetch };
};

export default useGetHelp;
