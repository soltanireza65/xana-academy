import { useQuery } from "@tanstack/react-query";
import { IPost } from "../types/help";
import { xanaClient } from "./useAxiosFetch";

const useGetXanaHelp = ({ slug }: { slug: string }) => {
  const { data, isLoading, isError, refetch } = useQuery(
    [`useGetXanaHelp`, slug],
    async () => {
      const { data } = await xanaClient.request({
        method: "GET",
        url: `/wp/v2/xana_help`,
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

export default useGetXanaHelp;
