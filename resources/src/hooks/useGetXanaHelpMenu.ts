import { useQuery } from "@tanstack/react-query";
import { IMenuItem } from "../types/menu";
import { xanaClient } from "./useAxiosFetch";

const useGetXanaHelpMenu = () => {
  const { data, isLoading, isError, refetch } = useQuery(
    [`useGetXanaHelpMenu`],
    async () => {
      const { data } = await xanaClient.request({
        method: "GET",
        url: "/menus/v1/locations/xana-help-menu",
        params: {
          fields: "ID,title,meta,post_name,menu_item_parent,url,target",
        },
      });

      return data as IMenuItem[];
    },
    {
      refetchOnWindowFocus: false,
    }
  );
  return { xanaHelpMenu: data, isLoading, isError, refetchXanaHelpMenu: refetch };
};

export default useGetXanaHelpMenu;
