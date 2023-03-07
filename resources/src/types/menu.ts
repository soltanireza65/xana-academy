export interface IMenuItem {
    ID: number;
    menu_item_parent: string;
    post_name: string;
    title: string;
    url: string;
    target: string;
    meta: Meta;
}

interface Meta { }