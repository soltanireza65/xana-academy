import React, { useEffect, useState } from "react";
import { ILocation } from "../types/location";

interface ILocationProps {
  slug: string;
  pathname: string;
  href: string;
}
const useGetLocationProps = ({ slugIndex }: { slugIndex?: number }) => {
  const [locationProps, setLocationProps] = useState<ILocationProps>({
    slug: "",
    pathname: "",
    href: "",
  });
  useEffect(() => {
    const { pathname, href }: ILocation = window.location;
    const pathArray = pathname.split("/").filter((item) => item !== "");
    const slug = pathArray[slugIndex || pathArray.length - 1];
    setLocationProps({
      slug,
      pathname,
      href,
    });
  }, []);
  return locationProps;
};

export default useGetLocationProps;
