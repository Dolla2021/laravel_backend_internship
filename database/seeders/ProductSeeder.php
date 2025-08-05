<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [ 'id' => 1, 'name' => 'Smartphone X1', 'description' => 'Latest smartphones with powerful features.', 'image' => 'https://tse3.mm.bing.net/th/id/OIP.5efkDI4nGP3TFe70qL20FwHaHa?pid=ImgDet&w=207&h=207&c=7&dpr=1.6&o=7&rm=3', 'price' => 699.00, 'category' => 'electronics', 'colors' => ['Blue', 'Red', 'Green', 'Black'] ],
            [ 'id' => 2, 'name' => 'Classic Watch S7', 'description' => 'Stylish watches for every occasion.', 'image' => 'https://i.pinimg.com/originals/17/da/1c/17da1c5c2e793059947298db0973d674.jpg', 'price' => 149.99, 'category' => 'accessories', 'colors' => ['Blue', 'Red', 'Green', 'Black'] ],
            [ 'id' => 3, 'name' => 'Noise Cancelling Headphones', 'description' => 'High-quality sound for music lovers.', 'image' => 'https://img.freepik.com/premium-photo/headphones-extreme-minimalism_863013-168414.jpg?w=2000', 'price' => 149.00, 'category' => 'electronics', 'colors' => ['Blue', 'Red', 'Green', 'Black'] ],
            [ 'id' => 4, 'name' => 'Tablet Pro 10', 'description' => 'Sleek tablet with fast performance and high resolution.', 'image' => 'https://images.hothardware.com/contentimages/article/3027/content/small_angle-2-samsung-galaxy-tab-s7-plus.jpg', 'price' => 499.00, 'category' => 'electronics', 'colors' => ['Blue', 'Red', 'Green', 'Black'] ],
            [ 'id' => 5, 'name' => 'Fitness Tracker FitBand', 'description' => 'Track your health with precision.', 'image' => 'https://www.elettromedicali.it/wp-content/plugins/ant-webcommerce/global/images/lg/27237_b.jpg?x89244', 'price' => 89.00, 'category' => 'accessories', 'colors' => ['Blue', 'Red', 'Green', 'Black'] ],
            [ 'id' => 6, 'name' => 'Bluetooth Speaker BoomX', 'description' => 'Loud and clear sound anywhere.', 'image' => 'https://img.joomcdn.net/737c7df17432bd57841e2eecb71bf7ba8fafd8c1_original.jpeg', 'price' => 59.00, 'category' => 'electronics', 'colors' => ['Blue', 'Red', 'Green', 'Black'] ],
            [ 'id' => 7, 'name' => 'Gaming Laptop GX75', 'description' => 'High-end gaming laptop with RTX GPU.', 'image' => 'https://tse1.mm.bing.net/th/id/OIP.ZCUNzf3dfmjNafkmIqr9eAHaF7?rs=1&pid=ImgDetMain&o=7&rm=3', 'price' => 1599.00, 'category' => 'electronics', 'colors' => ['Blue', 'Red', 'Green', 'Black'] ],
            [ 'id' => 8, 'name' => 'Smart Home Camera', 'description' => 'Secure your home with smart monitoring.', 'image' => 'https://www.atcsjo.com/public/uploads/all/bS3zAv6BSr9lP5dVTb8sjiDC8WyGNcg0IMtUp4Aq.jpg', 'price' => 129.00, 'category' => 'electronics', 'colors' => ['Blue', 'Red', 'Green', 'Black'] ],
            [ 'id' => 9, 'name' => 'Mechanical Keyboard', 'description' => 'Responsive keys with RGB lighting.', 'image' => 'https://m.media-amazon.com/images/I/61P7MvyRbUL.jpg', 'price' => 89.00, 'category' => 'electronics', 'colors' => ['Blue', 'Red', 'Green', 'Black'] ],
            [ 'id' => 10, 'name' => 'Wireless Mouse Pro', 'description' => 'Ergonomic design with fast response.', 'image' => 'https://taipeicomputer.jo/image/cache/catalog/Products/Keyboards_Mice/G305_B-1200x1200.jpg', 'price' => 49.00, 'category' => 'electronics', 'colors' => ['Blue', 'Red', 'Green', 'Black'] ],
            [ 'id' => 11, 'name' => 'Drone 4K Vision', 'description' => 'Capture stunning aerial videos in 4K.', 'image' => 'https://5.imimg.com/data5/SELLER/Default/2022/6/SQ/ZG/YG/151745012/xdynamics-evolve-2-drone-500x500.jpg', 'price' => 299.00, 'category' => 'electronics', 'colors' => ['Blue', 'Red', 'Green', 'Black'] ],
            [ 'id' => 12, 'name' => 'Smart Light Bulb RGB', 'description' => 'Control your lighting with your voice.', 'image' => 'https://tse1.mm.bing.net/th/id/OIP.UX3NOyaZ4m3WBNDE17VvdgHaHa?w=1024&h=1024&rs=1&pid=ImgDetMain&o=7&rm=3', 'price' => 25.00, 'category' => 'household', 'colors' => ['Blue', 'Red', 'Green', 'Black'] ],
            [ 'id' => 13, 'name' => 'Laptop Stand Adjustable', 'description' => 'Improve your posture and airflow.', 'image' => 'https://cdn.onbuy.com/product/65b65f9ce18bf/500-500/laptop-stand-8-tier-adjustable-laptop-stand-holder-ergonomic-portable-laptop-riser-stand-ventilated-computer-stand-for-desk-compatible-with-laptops-up-to-17inch.jpg', 'price' => 35.00, 'category' => 'accessories', 'colors' => ['Blue', 'Red', 'Green', 'Black'] ],
            [ 'id' => 14, 'name' => 'Portable Charger 20000mAh', 'description' => 'Charge on the go.', 'image' => 'https://m.media-amazon.com/images/I/61rzzi8ISjL._AC_SL1500_.jpg', 'price' => 39.00, 'category' => 'electronics', 'colors' => ['Black', 'White'] ],
            [ 'id' => 15, 'name' => 'Smart Thermostat', 'description' => 'Control your home temperature remotely.', 'image' => 'https://images-na.ssl-images-amazon.com/images/I/71szw7oYH-L._AC_SL1500_.jpg', 'price' => 199.00, 'category' => 'household', 'colors' => ['White', 'Black'] ],
            [ 'id' => 16, 'name' => 'Action Camera 4K', 'description' => 'For adventures and extreme sports.', 'image' => 'https://m.media-amazon.com/images/I/81E2YeQnp0L._AC_SL1500_.jpg', 'price' => 120.00, 'category' => 'electronics', 'colors' => ['Black'] ],
            [ 'id' => 17, 'name' => 'Smart Door Lock', 'description' => 'Secure entry with fingerprint and mobile access.', 'image' => 'https://m.media-amazon.com/images/I/71iOd48QvXL._AC_SL1500_.jpg', 'price' => 220.00, 'category' => 'household', 'colors' => ['Black', 'Silver'] ],
            [ 'id' => 18, 'name' => 'Wireless Earbuds', 'description' => 'Compact and powerful wireless earbuds.', 'image' => 'https://m.media-amazon.com/images/I/61DJQ5hhZ2L._AC_SL1500_.jpg', 'price' => 59.00, 'category' => 'electronics', 'colors' => ['White', 'Black'] ],
            [ 'id' => 19, 'name' => 'LED Desk Lamp', 'description' => 'Dimmable desk lamp with USB charging port.', 'image' => 'https://m.media-amazon.com/images/I/61oKMWFHTvL._AC_SL1500_.jpg', 'price' => 29.00, 'category' => 'household', 'colors' => ['Black', 'White'] ],
            [ 'id' => 20, 'name' => 'Mini Projector', 'description' => 'Home cinema experience anywhere.', 'image' => 'https://m.media-amazon.com/images/I/61sXwWpkqgL._AC_SL1500_.jpg', 'price' => 89.00, 'category' => 'electronics', 'colors' => ['White', 'Black'] ],
            [ 'id' => 21, 'name' => 'USB-C Hub', 'description' => 'Expand your device connectivity.', 'image' => 'https://m.media-amazon.com/images/I/71PgK8xjq-L._AC_SL1500_.jpg', 'price' => 45.00, 'category' => 'accessories', 'colors' => ['Grey'] ],
            [ 'id' => 22, 'name' => 'Smart Scale', 'description' => 'Track weight, BMI, and more.', 'image' => 'https://m.media-amazon.com/images/I/71HgHrmco3L._AC_SL1500_.jpg', 'price' => 59.00, 'category' => 'household', 'colors' => ['Black', 'White'] ],
            [ 'id' => 23, 'name' => 'Car Phone Mount', 'description' => 'Securely hold your phone in the car.', 'image' => 'https://m.media-amazon.com/images/I/71+Wiy2ezAL._AC_SL1500_.jpg', 'price' => 19.00, 'category' => 'accessories', 'colors' => ['Black'] ],
            [ 'id' => 24, 'name' => 'Electric Toothbrush', 'description' => 'Clean teeth with smart timers.', 'image' => 'https://m.media-amazon.com/images/I/71Y2o8bJo9L._AC_SL1500_.jpg', 'price' => 49.00, 'category' => 'household', 'colors' => ['White'] ],
            [ 'id' => 25, 'name' => 'Indoor Security Alarm', 'description' => 'Protect your home from intrusions.', 'image' => 'https://m.media-amazon.com/images/I/71Z2bmKJ6tL._AC_SL1500_.jpg', 'price' => 99.00, 'category' => 'household', 'colors' => ['White'] ],
            [ 'id' => 26, 'name' => 'Camera Tripod', 'description' => 'Sturdy tripod for photography and filming.', 'image' => 'https://m.media-amazon.com/images/I/61nTjN3Zt5L._AC_SL1500_.jpg', 'price' => 65.00, 'category' => 'accessories', 'colors' => ['Black'] ],
            [ 'id' => 27, 'name' => 'Photo Light Box', 'description' => 'Perfect lighting for product photography.', 'image' => 'https://m.media-amazon.com/images/I/71KPm9pHScL._AC_SL1500_.jpg', 'price' => 85.00, 'category' => 'accessories', 'colors' => ['White'] ],
            [ 'id' => 28, 'name' => 'Cable Organizer Box', 'description' => 'Keep cables neat and tidy.', 'image' => 'https://m.media-amazon.com/images/I/71rZy+mAP6L._AC_SL1500_.jpg', 'price' => 15.00, 'category' => 'household', 'colors' => ['White', 'Black'] ],
            [ 'id' => 29, 'name' => 'Ergonomic Office Chair', 'description' => 'Supportive and comfortable for long hours.', 'image' => 'https://m.media-amazon.com/images/I/71a3N7f8JrL._AC_SL1500_.jpg', 'price' => 179.00, 'category' => 'household', 'colors' => ['Black', 'Grey'] ],
            [ 'id' => 30, 'name' => 'USB LED Strip Lights', 'description' => 'Add ambiance to your space.', 'image' => 'https://m.media-amazon.com/images/I/71kUG3vq4nL._AC_SL1500_.jpg', 'price' => 22.00, 'category' => 'electronics', 'colors' => ['Multicolor'] ],
            [ 'id' => 31, 'name' => 'Wireless Charging Pad', 'description' => 'Charge compatible devices wirelessly.', 'image' => 'https://m.media-amazon.com/images/I/61PmjW+a6tL._AC_SL1500_.jpg', 'price' => 39.00, 'category' => 'electronics', 'colors' => ['Black'] ],
            [ 'id' => 32, 'name' => 'USB Desk Fan', 'description' => 'Stay cool while you work.', 'image' => 'https://m.media-amazon.com/images/I/71eMwYccGAL._AC_SL1500_.jpg', 'price' => 25.00, 'category' => 'household', 'colors' => ['White', 'Black'] ],
            [ 'id' => 33, 'name' => 'Digital Alarm Clock', 'description' => 'Modern clock with multiple functions.', 'image' => 'https://m.media-amazon.com/images/I/61eQh+x7KXL._AC_SL1500_.jpg', 'price' => 29.00, 'category' => 'household', 'colors' => ['Black', 'White'] ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
