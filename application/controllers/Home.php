<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("HomeModel");
    }

    public function index()
    {
        $data["list_product"] = $this->HomeModel->getProduct();
        $data["content"] = "home";
        $this->load->view("template", $data);
    }

    public function shoppingCart()
    {
        $data["content"] = "shoppingCart";
        $this->load->view("template", $data);
    }

    public function insertCart()
    {
        $this->cart->insert([
            "id" => $this->input->post("id"),
            "qty" => 1,
            'price' => $this->input->post("harga"),
            'name' => $this->input->post("nama_barang"),
        ]);
        $this->session->set_flashdata([
            "type" => "success",
            "message" => "Your item has been added to cart."
        ]);
        redirect("Home");
    }

    public function updateCart()
    {
        foreach ($this->cart->contents() as $value) {
            $this->cart->update([
                "rowid" => $value["rowid"],
                "qty" => $this->input->post($value["rowid"])
            ]);
        }
        $this->session->set_flashdata([
            "type" => "success",
            "message" => "Your items have been updated to cart."
        ]);
        redirect("Home/shoppingCart");
    }

    public function removeCart($rowid)
    {
        $this->cart->remove($rowid);
        $this->session->set_flashdata([
            "type" => "success",
            "message" => "Your item has been removed from cart."
        ]);
        redirect("Home/shoppingCart");
    }
}
