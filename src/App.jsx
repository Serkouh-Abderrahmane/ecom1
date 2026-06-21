import Header from './components/ecommerce/Header.jsx';
import Hero from './components/ecommerce/Hero.jsx';
import CollectionShowcase from './components/ecommerce/CollectionShowcase.jsx';
import ProductCarousel from './components/ecommerce/ProductCarousel.jsx';
import SoftRoutine from './components/ecommerce/SoftRoutine.jsx';
import Newsletter from './components/ecommerce/Newsletter.jsx';
import Footer from './components/ecommerce/Footer.jsx';

export default function App() {
  return (
    <div className="app">
      <Header />
      <main className="main">
        <Hero />
        <CollectionShowcase />
        <ProductCarousel
          title="Trọn Bộ Hoodie Độc Lạ!"
          type="hoodie"
        />
        <ProductCarousel
          title="Các BST Sweater Mới Nhất!"
          type="sweater"
        />
        <SoftRoutine />
        <Newsletter />
      </main>
      <Footer />
    </div>
  );
}
