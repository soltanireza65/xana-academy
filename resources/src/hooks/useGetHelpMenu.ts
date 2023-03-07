import { useQuery } from "@tanstack/react-query";
import { IMenuItem } from "../types/menu";
import { xanaClient } from "./useAxiosFetch";

const useGetHelpMenu = () => {
  const { data, isLoading, isError, refetch } = useQuery(
    [`useGetHelpMenu`],
    async () => {
      const { data } = await xanaClient.request({
        method: "GET",
        url: "/menus/v1/locations/help-menu",
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
  return { helpMenu: data, isLoading, isError, refetchHelpMenu: refetch };
};

export default useGetHelpMenu;
