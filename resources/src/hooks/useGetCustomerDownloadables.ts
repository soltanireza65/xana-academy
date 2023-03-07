// @ts-nocheck - may need to be at the start of file

import { useQuery } from "@tanstack/react-query";
import qs from "qs";
import { IDownloadable } from "../types/downloadable";
import { xanaClient } from "./useAxiosFetch";

const useGetCustomerDownloadables = () => {
  const { data, isLoading, isError, refetch } = useQuery(
    [`useGetCustomerDownloadables`],
    async () => {
      const { data } = await xanaClient.post(
        xana.ajaxUrl,
        qs.stringify({ action: "getCustomerDLs", ajax_nonce: xana.ajax_nonce })
      );

      return data as IDownloadable[];
    },
    {
      //   refetchOnWindowFocus: false,
    }
  );
  return {
    Downloadables: data,
    isLoading,
    isError,
    refetchDownloadables: refetch,
  };
};

export default useGetCustomerDownloadables;
