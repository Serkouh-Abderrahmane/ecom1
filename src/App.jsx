import 'swiper/css';
import AnnouncementBar from './components/ecommerce/AnnouncementBar.jsx';
import Header from './components/ecommerce/Header.jsx';
import Hero from './components/ecommerce/Hero.jsx';
import FeaturedCategories from './components/ecommerce/FeaturedCategories.jsx';
import CollectionShowcase from './components/ecommerce/CollectionShowcase.jsx';
import ProductCarousel from './components/ecommerce/ProductCarousel.jsx';
import BestSellers from './components/ecommerce/BestSellers.jsx';
import SoftRoutine from './components/ecommerce/SoftRoutine.jsx';
import CustomerGallery from './components/ecommerce/CustomerGallery.jsx';
import Footer from './components/ecommerce/Footer.jsx';

export default function App() {
  return (
    <div className="app">
      <AnnouncementBar />
      <Header />
      <main className="main">
        <Hero />
        <FeaturedCategories />
        <CollectionShowcase />
        <ProductCarousel
          title="Áo Hoodie Mới Nhất"
          type="hoodie"
        />
        <BestSellers />
        <ProductCarousel
          title="BST Sweater Mới Nhất"
          type="sweater"
        />
        <SoftRoutine />
        <CustomerGallery />
      </main>
      <Footer />
    </div>
  );
}
