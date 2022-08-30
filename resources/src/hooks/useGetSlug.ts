import React, { useEffect } from "react";
import { ILocation } from "../types/location";

const useGetSlug = () => {
  // const loc : ILocation
  const [slug, setSlug] = React.useState<string | null>(null);
  useEffect(() => {
    const path = window.location.pathname;
    const pathArray = path.split("/");
    const slug = pathArray[pathArray.length - 1];
    setSlug(slug);
  }, []);
  return slug;
};

export default useGetSlug;
