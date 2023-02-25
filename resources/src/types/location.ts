export interface ILocation {
    ancestorOrigins: AncestorOrigins
    href: string
    origin: string
    protocol: string
    host: string
    hostname: string
    port: string
    pathname: string
    search: string
    hash: string
}

export interface AncestorOrigins { }


// const locationSample: ILocation = {
//     "ancestorOrigins": {},
//     "href": "https://academy.xana.biz/xanis-trade-guide/namaye-koli-samane/#",
//     "origin": "https://academy.xana.biz",
//     "protocol": "https:",
//     "host": "academy.xana.biz",
//     "hostname": "academy.xana.biz",
//     "port": "",
//     "pathname": "/xanis-trade-guide/namaye-koli-samane/",
//     "search": "",
//     "hash": ""
// }