import { useState, useEffect } from "react";
import axios, { AxiosRequestConfig } from "axios";

export const xanaClient = axios.create({
  // @ts-ignore
  baseURL: `${xana.site_url}/wp-json`,
});

// const foo = <T extends unknown>(x: T) => x;

export const useAxiosFetch = <T>(params: AxiosRequestConfig<any>) => {
  const [data, setData] = useState<T | null>(null);
  const [error, setError] = useState<any>(null);
  const [loading, setLoading] = useState<boolean>(true);
  const fetchData = async (): Promise<void> => {
    try {
      const response = await xanaClient.request(params);
      setData(response.data);
    } catch (error) {
      if (axios.isAxiosError(error)) {
        setError("Axios Error with Message: " + error.message);
      } else {
        setError(error);
      }
      setLoading(false);
    } finally {
      setLoading(false);
    }
  };
  useEffect(() => {
    fetchData();
  }, []);
  return { data, error, loading, fetchData } as const;
};
