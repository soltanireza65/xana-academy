export interface IDownloadable {
  download_url: string;
  download_id: string;
  product_id: number;
  product_name: string;
  product_url: string;
  download_name: string;
  order_id: number;
  order_key: string;
  downloads_remaining: string;
  access_expires: null;
  file: File;
}

export interface File {
  name: string;
  file: string;
}
