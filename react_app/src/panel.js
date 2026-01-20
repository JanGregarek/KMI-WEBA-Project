const PanelButton = ({ text, color, inverse }) => {
    const baseStyle = {
        padding: "8px 16px",
        border: "none",
        fontWeight: "bold",
        fontSize: "14px",
    };
    const style = inverse
      ? {
          ...baseStyle,
          backgroundColor: color,
          color: "white",
        }
      : {
          ...baseStyle,
          backgroundColor: color,
          color: "black",
        };

    return <button style={style}>{text}</button>;
};

export function Panel({ buttons, shadow }) {
  return (
    <div
      style={{
        display: "inline-flex",
        overflow: "hidden",
        borderRadius: "10px",
        margin: "5px",
        boxShadow: shadow ? "0 4px 12px rgba(0,0,0,0.15)" : "none",
      }}
    >
      {buttons.map((btn, idx) => (
        <PanelButton key={idx} {...btn} />
      ))}
    </div>
  );
}