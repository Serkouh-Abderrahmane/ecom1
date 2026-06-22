const announcements = [
  'FREE SHIPPING OVER 500K',
  'NEW COLLECTION JUST DROPPED',
  'LIMITED STOCK AVAILABLE',
  'FREE SHIPPING OVER 500K',
  'NEW COLLECTION JUST DROPPED',
  'LIMITED STOCK AVAILABLE',
];

export default function AnnouncementBar() {
  return (
    <div className="announcement-bar">
      <div className="announcement-track">
        {announcements.map((text, i) => (
          <span key={i} className="announcement-item">{text}</span>
        ))}
      </div>
    </div>
  );
}
